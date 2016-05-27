import picamera
from picamera import PiCamera
import time

camera = PiCamera()
    
camera.resolution = (640, 480)
camera.start_recording('/var/www/PiCamServer/vids/vidstream.mp4')
time.sleep(5)
camera.stop_recording()
