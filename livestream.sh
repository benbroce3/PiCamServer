#!/bin/sh
raspivid -o - -t 0 -w 640 -h 480 -fps 30 -vf | cvlc -vvv stream:///dev/stdin --sout '#rtp{sdp=rtsp://:8554/}' :demux=h264
