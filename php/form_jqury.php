<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>JQuay</title>
</head>

<body>
  <div>
    <div>
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-12">
            <p class="h1 text-start">Sign UP Here!</p>
          </div>
        </div>
        <form action="" class="form-group">
          <div class="form-group row">
            <div class="col-md-6">
              <label for="name">Name:</label>
              <input type="text" class="form-control" placeholder="name" id="name">
              <div class="text-danger" id="name_err">*</div>
            </div>

            <div class="col-md-6">
              <label for="phone">Phone</label>
              <input type="tel" class="form-control" placeholder="Enter Phone Number" id="phone">
              <div class="text-danger" id="phone_err">*</div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label for="email">Email</label>
              <input type="email" class="form-control" placeholder="Enter email" id="email">
              <div class="text-danger" id="email_err">*</div>
            </div>

            <div class="col-md-6">
              <label for="password">Password</label>
              <input type="password" class="form-control" placeholder="Enter password" id="password">
              <div class="text-danger" id="pass_err">*</div>
            </div>
          </div>
          <div id="form-btn">
            <button type="button" class="btn btn-primary m-2" name="submit" id="reg">Register</button>
          </div>

        </form>
        <table id="table1" class="table">
          <thead>
            <th>name</th>
            <th>phone</th>
            <th>email</th>
            <th>password</th>
            <th><button type='button' class='btn btn-primary m-2' onclick='delAll()'>delete </button></th>
          </thead>
          <tbody id="row-1">

          </tbody>
        </table>
      </div>

    </div>
  </div>
</body>

<script>
  var global_form_data = [];
  global_form_data = JSON.parse(localStorage.getItem('formdata'));

  $(document).ready(function() {
    var array_list = [];
    console.log(JSON.parse(localStorage.getItem('formdata')));
    if (JSON.parse(localStorage.getItem('formdata') != null)) {
      var array_list = JSON.parse(localStorage.getItem('formdata'));
      for (var i = 0; i < array_list.length; i++) {
        $('#row-1').append("<tr id='set" + i + "' class = 'all_del'><td>" + array_list[i].names + '</td><td>' + array_list[i].phone_1 + '</td><td>' + array_list[i]['email_1'] + '</td><td>' + array_list[i].password + "</td><td>" + "<button type='button' class='btn btn-primary m-2' id='del-set" + i + "' onclick='del(" + i + ")'>delete</button>/<a type='button' onclick='update(" + i + ")'>update</a></td></tr>")
      }

    }

    $('button#reg').click(function() {
      // arr_list = JSON.parse(localStorage.getItem('formdata'));

      $('#row-1').html("")

      var name = $("input#name").val();
      var phone = $("input#phone").val();
      var email = $("input#email").val();
      var pass = $("input#password").val();
      var data = {
        name: name,
        phone: phone,
        email: email,
        password: pass
      }

      if ((valid(data) == true)) {
        var arr_data = {
          names: name,
          phone_1: phone,
          email_1: email,
          password: pass
        }
          array_list.push(arr_data);
          
          
          for (var i = 0; i < array_list.length; i++) {
            $('#row-1').append("<tr id='set" + i + "'><td>" + array_list[i].names + '</td><td>' + array_list[i].phone_1 + '</td><td>' + array_list[i]['email_1'] + '</td><td>' + array_list[i].password + "</td><td>" + "<button type='button' class='btn btn-primary m-2' id='del-set" + i + "' onclick='del(" + i + ")'>delete</button>/<a type='button' onclick='update(" + i + ")'>update</a></td></tr>")
          }
          localStorage.setItem('formdata', JSON.stringify(array_list))
          console.log("local data", JSON.stringify(array_list));
          
        }

    });


  });

  function valid(data) {

    var isvalide = false;

    if (data.name == "") {
      isvalide = false;
      $("#name_err").html("this field is rqeured");
    } else {
      isvalide = true;
      $("#name_err").html("");
    }

    if ((data.phone.match("^(([0-9]{10}))$")) == null) {
      isvalid = false;
      $('#phone_err').html('*enter a valid phone');
    } else {
      isvalid = true;
      $('#phone_err').html('');
    }

    if ((data.email.match('^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$')) == null) {
      isvalid = false;
      $('#email_err').html('*enter a valid email.');
    } else {
      isvalid = true;
      $('#email_err').html('');
    }

    return isvalide;
  }



  function del(val) {
    arr_list = JSON.parse(localStorage.getItem('formdata'));

    arr_list.splice(val, 1);
    console.log(arr_list);
    localStorage.setItem('formdata', JSON.stringify(arr_list))

    $('#set' + val).remove();
  }

  function delAll() {
    localStorage.clear();
    $('#row-1').html('');
  }

  function update(val) {

    $('#name').val(global_form_data[val].names);
    $('#email').val(global_form_data[val].email_1);
    $('#phone').val(global_form_data[val].phone_1);
    $('#password').val(global_form_data[val].password);
    $('#form-btn').append('<button type="button" class="btn btn-primary m-2" id="update" onclick="updateField(' + val + ')">Update</button>')
  }

  function updateField(val) {
    var name = $("input#name").val();
    var phone = $("input#phone").val();
    var email = $("input#email").val();
    var pass = $("input#password").val();
    $('#row-1').html("")
    var data = {
      name: name,
      phone: phone,
      email: email,
      password: pass
    }
    if ((valid(data) == true)) {
      var arr_data = {
        names: name,
        phone_1: phone,
        email_1: email,
        password: pass
      }
      global_form_data[val] = arr_data;
      localStorage.setItem('formdata', JSON.stringify(global_form_data))
      
    }
    // if (JSON.parse(localStorage.getItem('formdata') != null)) {
      ///var global_form_data = JSON.parse(localStorage.getItem('formdata'));
      console.log("global_form_data",global_form_data)
      for (var i = 0; i < global_form_data.length; i++) {
          
        $('#row-1').append("<tr id='set" + i + "'><td>" + global_form_data[i].names + '</td><td>' + global_form_data[i].phone_1 + '</td><td>' + global_form_data[i]['email_1'] + '</td><td>' + global_form_data[i].password + "</td><td>" + "<button type='button' class='btn btn-primary m-2' id='del-set" + i + "' onclick='del(" + i + ")'>delete</button>/<a type='button' onclick='update(" + i + ")'>update</a></td></tr>")
          
        // $('#row-1').append("<tr id='set" + val + "' class = 'all_del'><td>" + global_form_data[val].names + '</td><td>' + global_form_data[val].phone_1 + '</td><td>' + global_form_data[val]['email_1'] + '</td><td>' + global_form_data[val].password + "</td><td>" + "<button type='button' class='btn btn-primary m-2' id='del-set" + val + "' onclick='del(" + val + ")'>delete</button>/<a type='button' onclick='update(" + val + ")'>update</a></td></tr>")
      }

    // }
    // console.log('update',global_form_data)
  }
</script>

</html>