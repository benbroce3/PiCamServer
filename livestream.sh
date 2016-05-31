#!/bin/sh
raspivid -o - -t 0 -w 600 -h 400 -fps 12 -vf | cvlc -vvv stream:///dev/stdin --sout '#rtp{sdp=rtsp://:8554/}' :demux=h264
