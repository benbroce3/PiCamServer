import picamera
from picamera import PiCamera
import time
from datetime import datetime
import os.path

camera = PiCamera()
counter = 0

camera.rotation = 180

print "Security Camera Logger v1 : by Ben Broce & William Hampton\n\n"
print "Will display video feed & capture images at a given interval."
print "Images go to /home/pi/camlog, Alt-F4 closes feed, Ctrl-C quits.\n\n"

length = raw_input("How long should I run (in minutes): ")
length = float(length)*60
interval = raw_input("How often should I take a picture (in seconds): ")
interval = float(interval)+2

camera.annotate_background = picamera.Color('black')

while (counter <= length):
	timestamp = datetime.now().strftime("%m-%d-%Y_%H:%M:%S")
	camera.annotate_text = timestamp
        path = '../../../../var/www/html/PiCamServer/pics/' + timestamp + '.jpg'
        camera.capture(path)
        camera.start_preview()
        time.sleep(interval)
        camera.stop_preview()
        counter += interval
        length -= 2
