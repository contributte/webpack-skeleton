.PHONY: project install setup qa dev cs csf phpstan tests build

############################################################
# PROJECT ##################################################
############################################################

project: install setup

install:
	composer install

setup:
	mkdir -p var/{tmp,log}
	chmod +0777 var/{tmp,log}

############################################################
# DEVELOPMENT ##############################################
############################################################

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

#####################
# LOCAL DEVELOPMENT #
#####################

dev:
	NETTE_DEBUG=1 NETTE_ENV=dev php -S 0.0.0.0:8000 -t www

spa:
	npm run dev
