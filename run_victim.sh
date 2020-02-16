workingdir=$(dirname $0)
docker run --volume $workingdir/victim_server:/var/www/html -p 8080:80 php:5.6-apache
