import picamera
from picamera import PiCamera
import time
from datetime import datetime
import os.path

camera = PiCamera()
counter = 0

camera.rotation = 180
camera.resolution = (640, 480)

print "Security Camera Logger v1 : by Ben Broce & William Hampton\n\n"
print "Will display video feed & capture images at a given interval."
print "Images go to /home/pi/camlog, Alt-F4 closes feed, Ctrl-C quits.\n\n"

length = raw_input("How long should I run (in minutes): ")
length = float(length)*60
interval = raw_input("How often should I take a picture (in seconds): ")
interval = float(interval)

camera.annotate_background = picamera.Color('black')

camera.start_preview()
camera.start_recording('/var/www/PiCamServer/vids/vidstream.h264')
while (counter <= length):
  timestamp = datetime.now().strftime("%m-%d-%Y_%H:%M:%S")
  camera.annotate_text = timestamp
  path = '/var/www/PiCamServer/pics/' + timestamp + '.jpg'
  camera.capture(path, use_video_port=True)
  camera.wait_recording(interval)
  counter += interval
camera.stop_recording()
camera.stop_preview()
