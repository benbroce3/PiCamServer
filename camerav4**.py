_____________________________________________________________________________________________________

import io

def write_video(stream):
	print "Writing video!"
	with stream.lock:
		# Find the first header frame in the video
		for frame in stream.frames:
			if frame.frame_type == picamera.PiVideoFrameType.sps_header:
				stream.seek(frame.position)
				break
		# Write the rest of the stream to disk (write binary)
		with io.open('/var/www/vids/vidstream.h264', 'wb') as output:
			output.write(stream.read())

stream = picamera.PiCameraCircularIO(camera, seconds=2)
camera.start_recording(stream, format='h264')
try:
	while True:
		camera.wait_recording(1)
		if write_now():
			# write the stream to disk
			write_video(stream)
finally:
	camera.stop_recording()
