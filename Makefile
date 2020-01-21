.PHONY: help     # Generate list of targets with descriptions
help:
	@echo "\n"
	@grep '^.PHONY: .* #' Makefile | sed 's/\.PHONY: \(.*\) # \(.*\)/\1 \2/' | expand -t20


.PHONY: build    # Builds Docker PHP Image
build:
	docker-compose -f build/docker/docker-compose.yml build php

.PHONY: up       # Creates container for PHP
up:
	docker-compose -f build/docker/docker-compose.yml up -d --remove-orphans

.PHONY: down     # It shuts down the running PHP container
down:
	docker-compose -f build/docker/docker-compose.yml down

.PHONY: ssh      # Enters the PHP Container
ssh:
	docker-compose -f build/docker/docker-compose.yml exec php sh