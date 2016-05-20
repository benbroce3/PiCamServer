from picamera import PiCamera
import time
import datetime
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
directory = raw_input("What is the name of the directory for this session?: ")
directory = 'pics/' + directory

while (counter <= length):
        path = directory + image_count + '.jpg'
        camera.capture(path)
        camera.start_preview()
        time.sleep(interval)
        camera.stop_preview()
        counter += interval
	image_count += 1
        length -= 2

path = directory + image_count + '.jpg'
camera.capture(path)
