USER="root"
PASSWORD=""
DATABASE="inventary"
FINAL_OUTPUT=`date +%Y%m%d`_$DATABASE.sql

FINAL_OUTPUT=inventory/storage/backup/`date +%Y%m%d`_$DATABASE.sql
mysqldump --user=$USER --password=$PASSWORD $DATABASE > $FINAL_OUTPUT
gzip $FINAL_OUTPUT