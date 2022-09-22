ROOT:=$(shell pwd)
version ?= $(shell git log --pretty=format:'%h' -n 1)
SHELL  := env version=$(version) $(SHELL)
BUILD := latest

.PHONY: all
all: build

.PHONY: build
build: build-composer build-worker
build-composer:
	docker build --ssh default -t xphp:${BUILD} -f docker/xphp/Dockerfile .

build-worker:
	docker build --ssh default -t xphp-worker:${BUILD} -f docker/worker/Dockerfile .
