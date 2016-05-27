from picamera import PiCamera

with PiCamera() as camera:
    camera.resolution = (640, 480)
    camera.start_recording('vids/vidstream.h264')
    camera.wait_recording(60)
    camera.stop_recording()
