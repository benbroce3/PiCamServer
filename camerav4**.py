#Imports
import picamera
from picamera import PiCamera
import time
from datetime import datetime
import os.path
import io
import re

#Functions
#--exit if (y/n) input field 
def reYN():
	try:
		if not re.match("^y$)|(", input_str):
			 quit()
	except:
		print "Error: Invalid Input"
#About
print "\nSecurity Camera Logger v4 | Ben Broce & William Hampton\n\n"
print "Streams video to ../vids/vidstream.h264 | Captures to ../pics/[timestamp].jpg"
print "Ctrl-C quits.\n\n"

#Defines
camera = PiCamera()
counter = 0

#Session Config
#--check which functions to enable
Preview = raw_input("Should I display locally (y/n)? ")
streamVid = raw_input("Should I stream video (y/n)? ")
streamPic = raw_input("Should I take pictures (y/n)? ")
#--exit if pics and video both off
try:
	if Preview=="n" and streamVid=="n" and streamPic=="n":
		quit()
except:
	print "Error: No Functions Enabled"

length = float(raw_input("How long should I run (in minutes): "))*60
if streamPic == "y":
	interval = float(raw_input("How often should I take a picture (in seconds): "))

camera.rotation = 180
camera.resolution = (640, 480)
camera.annotate_background = picamera.Color('black')
stream = picamera.PiCameraCircularIO(camera, seconds=2)

#Begin
print "Running..."

try:
	camera.start_preview()
	if streamVid == "y":
		camera.start_recording('/var/www/vids/vidstream.h264')
	while (counter <= length):
		timestamp = datetime.now().strftime("%m-%d-%Y_%H:%M:%S")
		camera.annotate_text = timestamp
		path = '/var/www/PiCamServer/pics/' + timestamp + '.jpg'
		camera.capture(path, use_video_port=True)
		time.sleep(interval)
		counter += interval
finally:
	print "Exiting..."
	if streamVid == "y":
		camera.stop_recording()
	camera.stop_preview()

_____________________________________________________________________________________________________


camera.start_recording(stream, format='h264')
try:
	while True:
		camera.wait_recording(2)
		with stream.lock:
			# Find the first header frame in the video
			for frame in stream.frames:
				if frame.frame_type == picamera.PiVideoFrameType.sps_header:
					stream.seek(frame.position)
					break
			# Write the rest of the stream to disk (write binary)
			with io.open('/var/www/vids/vidstream.h264', 'wb') as output:
				output.write(stream.read())
finally:
	camera.stop_recording()
