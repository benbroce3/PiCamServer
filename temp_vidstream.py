import picamera
from picamera import PiCamera

camera = PiCamera()
    
camera.resolution = (640, 480)
camera.start_recording('/var/www/PiCamServer/vids/vidstream.mp4')
camera.wait_recording(60)
camera.stop_recording()
