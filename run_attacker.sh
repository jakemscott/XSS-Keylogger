workingdir=$(dirname $0)
docker run --volume $workingdir/attacker_server:/var/www/html -p 8081:80 php:5.6-apache
