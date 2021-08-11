<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Main</title>
</head>

<body>
    <div>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-12">
                    <p class="h1 text-start">Fill the Form!</p>
                </div>
            </div>
            <form action="" class="form-group">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" placeholder="name" id="name">
                        <div class="text-danger" class="errorMsg" id="name_err">*</div>
                    </div>

                    <div class="col-md-6">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" placeholder="Enter Phone Number" id="phone">
                        <div class="text-danger" class="errorMsg" id="phone_err">*</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Enter email" id="email">
                        <div class="text-danger" class="errorMsg" id="email_err">*</div>
                    </div>

                    <div class="col-md-6">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" placeholder="Enter address" id="address">
                        <div class="text-danger" class="errorMsg" id="addr_err" >*</div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <h3 class="display-6">Education: </h3>
                        <input type="checkbox" class="ads_Checkbox" name="education[]" value="10">
                        <label for="education">10th</label><br>
                        <input type="checkbox" class="ads_Checkbox" name="education[]" value="12">
                        <label for="education">12th</label><br>
                        <input type="checkbox" class="ads_Checkbox" name="education[]" value="under graduation">
                        <label for="education">Under graduation</label><br><br>
                        <div class="text-danger" class="errorMsg" id="edu_err">*</div>
                    </div>

                    <div class="col-md-6">
                        <h3 class="display-6">Gender:</h3>
                        <input type="radio" class="radio_btn" name="gender" value="male">
                        <label for="gender">Male</label><br>
                        <input type="radio" class="radio_btn" name="gender" value="female">
                        <label for="gender">Female</label><br>
                        <div class="text-danger" class="errorMsg" id="gender_err">*</div>
                    </div>
                </div>
                <div id="form-btn">
                    <button type="button" class="btn btn-primary m-2" name="submit" id="reg">Register</button>
                </div>

            </form>

        </div>

    </div>
</body>

<script>
    $(document).ready(function() {
        $(".errorMsg").hide();
        
        $("#reg").click(function() {
            var name = $("#name").val();
            var phone = $("input#phone").val();
            var email = $("#email").val();
            var address = $("#address").val();
            gender = $(".radio_btn:checked").map(function() {
                return this.value;
            }).get();
            var education = $('.ads_Checkbox:checked').map(function() {
                return this.value;
            }).get();

            var data = {
                name: name,
                phone: phone,
                email: email,
                address: address
            }
            // if (valid(data) == true) {
            //     console.log(data);
            //     // alert('name-' + name + '. phone-' + phone + '. email-' + email);

            // }
            $.ajax({
                type: "POST",
                url: "backend_serv.php",
                dataType: "json",
                data: data,
                success: function(data) {
                    console.log(data.msg.name)
                    if (data.code == "200") {
                        alert("Success: ");
                    } else {
                        if(data.msg.name==undefined){
                            $("#name_err").html('');
                           
                        }else{
                            $("#name_err").html(data.msg.name);
                        }
                        // alert(data.msg.name)
                        // $(".display-error").css("display", "block");
                        if (data.msg.name){
                            $("#name_err").html(data.msg.name);
                        }
                        if (data.msg.email){
                            $("#email_err").html(data.msg.email);
                        }
                        if (data.msg.phone){
                            $("#phone_err").html(data.msg.phone);
                        }
                        if (data.msg.address){
                            $("#addr_err").html(data.msg.address);
                        }
                    }
                }
            });

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

        if (data.address == '') {
            isvalide = false;
            $('#addr_err').html('fill the address.')
        } else {
            isvalide = true;
            $('#addr_err').html('');
        }

        return isvalide;
    }
</script>

</html>