import picamera
from picamera import PiCamera
import time
from datetime import datetime
import os.path
from subprocess32 import Popen

print "Security Camera Logger v4 | Ben Broce & William Hampton\n\n"
print "Streams video to rtsp://pi-ip:8554/ | Captures to pics/[timestamp].jpg"
print "Ctrl-C quits.\n\n"

stream = raw_input("Should I stream video or take pictures (v/p)? ")

print "Running..."

#http://www.raspberry-projects.com/pi/pi-hardware/raspberry-pi-camera/streaming-video-using-vlc-player
#http://www.diveintopython.net/scripts_and_streams/stdin_stdout_stderr.html
#Ouput video (record) => stream => stdout => | => cvlc livestream => browser

if stream == ("v" or "V"):
	Popen(["./livestream.sh"])
elif stream == ("p" or "P"):
	length = float(raw_input("How long should I run (in minutes): "))*60
	interval = float(raw_input("How often should I take a picture (in seconds): "))
	
	camera = PiCamera()
	camera.annotate_background = picamera.Color('black')
	camera.rotation = 180
	camera.resolution = (640, 480)
	
	counter = 0
	
	try:
		camera.start_preview()
		while (counter <= length):
			timestamp = datetime.now().strftime("%m-%d-%Y_%H:%M:%S")
			camera.annotate_text = timestamp
			path = 'pics/' + timestamp + '.jpg'
			camera.capture(path, use_video_port=True)
			time.sleep(interval)
			counter += interval
	finally:
		print "Exiting..."
		camera.stop_preview()
else:
	print "Invalid input!"
