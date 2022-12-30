@echo off
REM ----------------------------------------------------------------
REM Create a directory to save mysql backup files if not already exists REM ----------------------------------------------------------------

IF NOT EXIST "D:\RMS_BACKUPS" mkdir D:\RMS_BACKUPS

SET dt=%date:~-4%_%date:~3,2%_%date:~0,2%_%time:~0,2%_%time:~3,2%_%time:~6,2%



REM ----------------------------------------------------------------
REM Display some message on the screen about the backup
REM ----------------------------------------------------------------
ECHO Starting Backup of MySQL Database
ECHO Backup is going to save in D:\RMS_BACKUPS\ folder.
ECHO Please wait ...

REM ----------------------------------------------------------------
REM mysqldump backup command. append date and time in filename
REM ----------------------------------------------------------------


CD D: 

CD /xampp/mysql/bin

mysqldump --user=root --password="" rms_database > D:\RMS_BACKUPS\sql_backup.sql

ECHO.
ECHO Backup completed!
ECHO Backup saved in D:\MYSQLBACKUPS\
ECHO Thank You for backing up!
ECHO I am about to show you the backup files.

PAUSE

REM Show user the backup files
EXPLORER D:\RMS_BACKUPS\
EXIT

