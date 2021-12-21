############################################################
# PROJECT ##################################################
############################################################
.PHONY: project install setup

project: install setup

install:
	composer install
	npm install

setup:
	mkdir -p var/{tmp,log}
	chmod +0777 var/{tmp,log}

############################################################
# DEVELOPMENT ##############################################
############################################################
.PHONY: qa dev cs csf phpstan tests coverage dev spa

qa: cs phpstan

cs:
	vendor/bin/codesniffer app

csf:
	vendor/bin/codefixer app

phpstan:
	echo "OK"

tests:
	echo "OK"

coverage:
	echo "OK"

dev:
	NETTE_DEBUG=1 NETTE_ENV=dev php -S 0.0.0.0:8000 -t www

spa:
	npm run dev

############################################################
# DEPLOYMENT ###############################################
############################################################
.PHONY: build

build:
	npm run start
