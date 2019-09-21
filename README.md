# symfony-command-tareas-cron
Proyecto en Symfony 4 que crea un Comando para poder ejecutar desde la consola, apunta principalmente a que ejecute todas las tareas de mantenimiento necesarias para que sean ejecutadas vía CRON.

minutos (0-59), horas (0-23), día del mes (1-31), mes (1-12) y día de la semana (0-6, 0=domingo)

ejecuta a las 3am de todos los días
0 3 * * * php /home/miusuario/Documents/Aprendiendo/ComputerScience/Programacion/PHP/Frameworks/Symfony/symfony-command-tareas-cron/bin/console app:tareas-cron
