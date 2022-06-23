echo off 

color 90
set TIMESTAMP=%DATE:~10,4%%DATE:~4,2%%DATE:~7,2%

::"C:\Program Files\MySQL\MySQLWorkbench6.3CE\mysqldump.exe" -uroot -ppassword -hlocalhost -P3307 ecommerce  > C:\Users\User\Desktop\backmeup\destination_\ecommerce.%TIMESTAMP%.sql
 ::mysqldump -u root -p sarabun >C:\xampp\htdocs\E-lecsarabun\sql\backup-%TIMESTAMP%.sql



@echo off

    call :MsgBox "You want to backup?"  "VBYesNo+VBQuestion" "Click Yes to Backup Database"
    if errorlevel 7 (
        echo NO - don't want to backup.
    ) else if errorlevel 6 (
        echo If there is no password, press Enter.
        md backup\%TIMESTAMP%
        md backup\%TIMESTAMP%\sql
        md backup\%TIMESTAMP%\doc
        mysqldump -u root -p sarabun >C:\xampp\htdocs\E-lecsarabun\backup\%TIMESTAMP%\sql\backup-%TIMESTAMP%.sql
        ROBOCOPY "C:\xampp\htdocs\E-lecsarabun\doc" "C:\xampp\htdocs\E-lecsarabun\backup\%TIMESTAMP%\doc" /mir
        call:MsgBox "Complate." 
    )

    exit /b

:MsgBox prompt type title
    setlocal enableextensions
    set "tempFile=%temp%\%~nx0.%random%%random%%random%vbs.tmp"
    >"%tempFile%" echo(WScript.Quit msgBox("%~1",%~2,"%~3") & cscript //nologo //e:vbscript "%tempFile%"
    set "exitCode=%errorlevel%" & del "%tempFile%" >nul 2>nul
    endlocal & exit /b %exitCode%
    
:: problem 
:: https://github.com/spatie/laravel-backup/issues/289 <- mysqldump is not recognized...
:: https://stackoverflow.com/questions/36834203/automatic-mysql-backup-using-batch-file <- create bat file

:: Batch Script 
:: https://www.tutorialspoint.com/batch_script/index.htm <- learn batch script

