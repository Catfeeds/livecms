#--------------------------------------------  
控制台demo[gearman]  
    //启动gearman    
  /usr/local/Cellar/gearman/1.1.18/sbin/gearmand -d  
  //查看所有命令  
  php console.php  
  //启动worker
  php console.php Gearman:worker  
  //gearman客户端[显示及反转]  
  php console.php Gearman:client normal something  
  php console.php Gearman:client reverse something  
#--------------------------------------------
