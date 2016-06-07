#!/usr/bin/python3

import picamera
from picamera import PiCamera
import time
from datetime import datetime
from subprocess import Popen

print("\nPiCamServer Camera Backend v5\n")
print("Streams video to rtsp://pi-ip:8554/ | Captures to pics/[timestamp].jpg")
print("Ctrl-C quits.\n")

configNow = input("Configure session settings now (y/n)? ").lower()
stream = input("Should I stream video or take pictures (v/p)? ").lower()
preview = input("Should I display video preview on Pi (y/n)? ").lower()

print("Running...")

#http://www.raspberry-projects.com/pi/pi-hardware/raspberry-pi-camera/streaming-video-using-vlc-player
#http://www.diveintopython.net/scripts_and_streams/stdin_stdout_stderr.html
#Ouput video (record) => stream => stdout => | => cvlc livestream => browser

if (stream == "v"):
	try:
		live = Popen(["./livestream.sh"])
	finally:
		print("\n\nExiting...")
		live.terminate()
elif (stream == "p"):
	length = float(input("How long should I run (in minutes): "))*60
	interval = float(input("How often should I take a picture (in seconds): "))
	
	camera = PiCamera()
	camera.annotate_background = picamera.Color('black')
	camera.rotation = 180
	camera.resolution = (640, 480)
	
	counter = 0
	
	try:
		if (preview == "y"):
			camera.start_preview()
		while (counter <= length):
			#nice-looking timestamp for overlay
			timestamp = datetime.now().strftime("%m-%d-%Y_%H:%M:%S")
			camera.annotate_text = timestamp
			#seconds since unix epoch for filename
			filetime = int(time.time())
			path = 'pics/' + filetime + '.jpg'
			camera.capture(path, use_video_port=True)
			time.sleep(interval)
			counter += interval
	finally:
		print("Exiting...")
		if (preview == "y"):
			camera.stop_preview()
else:
	print("Invalid input!")
