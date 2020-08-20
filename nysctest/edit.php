echo "\n DB selected as nysc successfully";

 //insert query
  $sql='INSERT into corp_member_details( name,callup_number,statecode,cds,ppa,password) VALUES('$Name'$_POST['name'],'$Callup_Number'$_POST['callup_number'],'$Statecode'$_POST['statecode'],'$Cds'$_POST['cds'],'$Ppa'$_POST['ppa'],'$Password'$_POST['password'])';

  if ($conn->query($sql)===true) {
  	echo "New Record Inserted successfully";
  } else{
  	echo "Error;" .sql ."<br>" .$conn->error;
  }
 mysqli_close($_conn);
  mysqli_select_db($conn,"nysc_db");





   $stmt = $conn->prepare("insert into corp_member_details(name,callup_number,statecode,cds,ppa,password) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss",$Name,$Callup_Number,$Statecode,$Cds,$Ppa,$Password);
    $stmt->execute();
    echo "Registration Successful";
    $stmt->close();
    $conn->close();
  }
  



    <br>
    <br>
    <br>
    <br>
<label>Enter Name</label>
    <input type="text" name="name" required="required"><p/>
    <label>Callup Number</label>
    <input type="text" name="callup_number"><p/>
    <label>Statecode</label>
    <input type="text" name="statecode" required="required"><p/>
    <label>Cds</label>
    <input type="text" name="cds" required="required"><p/>
    <label>Ppa</label>
    <input type="text" name="ppa" required="required"><p/>
    <label>Enter Password</label>
    <input type="password" name="password"required= "required"><p/>
    <input type="submit" name="Register">
