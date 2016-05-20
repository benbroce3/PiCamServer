#imports
from picamera import PiCamera
import time
import datetime
import os.path

#defines
camera = PiCamera()
counter = 0

#changes orientation
camera.rotation = 180

#info
print "Security Camera Logger v1 : by Ben Broce & William Hampton\n\n"
print "Will display video feed & capture images at a given interval."
print "Images go to /home/pi/camlog, Alt-F4 closes feed, Ctrl-C quits.\n\n"

#user config
length = raw_input("How long should I run (in minutes): ")
length = float(length)*60
interval = raw_input("How often should I take a picture (in seconds): ")
interval = float(interval)+2

#main loop
while (counter <= length):
	#grab image & save
	timestamp = time.strftime("%m-%d-%Y_%H:%M:%S")
	path = '/home/pi/camlog/img' + timestamp + '.jpg'
	camera.capture(path)
	#start video feed
	camera.start_preview()
	#wait for interval while previewing
	time.sleep(interval)
	#stop video feed
	camera.stop_preview()
	#increment clock counter
	counter += interval
	length -= 2

#grab image & save
timestamp = time.strftime("%m-%d-%Y_%H:%M:%S")
path = '/home/pi/camlog/img' + timestamp + '.jpg'
camera.capture(path)
