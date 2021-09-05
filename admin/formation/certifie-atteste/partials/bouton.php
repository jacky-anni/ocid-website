
 <div class="margin ">
     <div class="btn-group">

      <a href="?page=participants-certifiés&id=<?= $formation->id ?>" style="color: white;"><button type="button" class="btn btn-success"><i class="fa fa-file"></i> Liste des certifiants</button></a>
      
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span> 
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu" role="menu">
  
        <li><a href="?page=certificats&id=<?= $formation->id ?>&dep1=Nord&dep2=Nord-est">Nord et du Nord-est</a></li>
        <li><a href="?page=certificats&id=<?= $formation->id ?>&dep1=Artibonite&dep2=Nord-ouest&dep3=Centre">Artibonite, Nord-ouest et Centre</a></li>
        <li><a href="?page=certificats&id=<?= $formation->id ?>&dep1=Ouest&dep2=Sud-est&dep3=Nippes">Ouest, du Sud-est et Nippes</a></li>
        <li><a href="?page=certificats&id=<?= $formation->id ?>&dep1=Sud&dep2=Grand-Anse">Sud et Grand-Anse</a></li>
      </ul>
    </div>


     <div class="btn-group">
      <a href="?page=participants-attestés&id=<?= $formation->id ?>" style="color: white;"><button type="button" class="btn btn-primary"><i class="fa fa-filer"></i>Liste des attestants</button></a>
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>  
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="?page=attestations&id=<?= $formation->id ?>&dep1=Nord&dep2=Nord-est">Nord et du Nord-est</a></li>
        <li><a href="?page=attestations&id=<?= $formation->id ?>&dep1=Artibonite&dep2=Nord-ouest&dep3=Centre">Artibonite, Nord-ouest et Centre</a></li>
        <li><a href="?page=attestations&id=<?= $formation->id ?>&dep1=Ouest&dep2=Sud-est&dep3=Nippes">Ouest, du Sud-est et Nippes</a></li>
        <li><a href="?page=attestations&id=<?= $formation->id ?>&dep1=Sud&dep2=Grand-Anse">Sud et Grand-Anse</a></li>
      </ul>
    </div>

    <div class="btn-group">
      <a href="?page=les-participants&id=<?= $formation->id ?>"><button type="button" class="btn btn-info"> <i class="fa fa-user"></i> Les participants</button></a>
    </div>
   
  </div> <hr/>