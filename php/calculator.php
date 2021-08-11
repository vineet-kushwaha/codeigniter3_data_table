<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Calculator</title>
</head>

<body>
    <div class="jumbotron">
        <h1 class="text-center display-5 ">Calculator</h1>
    </div>
    <div>
        <form class="form-group container">
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="value">Value: </label>
                    <input type="text" class="form-control" id="value" disabled>
                </div>
                <div class="col-sm-4">
                    <label for="result">Final Result </label>
                    <input type="text" class="form-control" id="result" disabled>
                </div>
                <div class="col-sm-1">
                    <label for=""> </label>
                    <input type="button" value="del" class="form-control btn-outline-warning" onclick="del_one()" />
                </div>
                <div class="col-sm-1">
                    <label for="result"> </label>
                    <input type="button" value="clear" class="form-control btn btn-outline-warning" onclick="clr()" />
                </div>
            </div>
            <div class="form-group row" >
            <div class="col my-5">
            <table class="m-auto ">
                <tr class="">
                    <td><input class="p-3 m-2 btn btn-outline-secondary form-control" type="button" value="1" onclick="disp('1')" /></td>
                    <td><input class="p-3 m-2 btn btn-outline-secondary form-control" type="button" value="2" onclick="disp('2')" /></td>
                    <td><input class="p-3 m-2 btn btn-outline-secondary form-control" type="button" value="3" onclick="disp('3')" /></td>
                    <td><input class="p-3 m-2 btn btn-outline-secondary form-control" type="button" value="/" onclick="disp('/')" /></td>
                </tr>
                <tr>
                    <td><input class="p-3 m-2 btn btn-outline-secondary form-control" type="button" value="4" onclick="disp('4')" /></td>
                    <td><input class="p-3 m-2 btn btn-outline-secondary form-control" type="button" value="5" onclick="disp('5')" /></td>
                    <td><input class="p-3 m-2 btn btn-outline-secondary form-control" type="button" value="6" onclick="disp('6')" /></td>
                    <td><input class="p-3 m-2 btn btn-outline-secondary form-control" type="button" value="*" onclick="disp('*')" /></td>
                </tr>
                <tr>
                    <td><input class="p-3 m-2 btn btn-outline-secondary form-control " type="button" value="7" onclick="disp('7')" /></td>
                    <td><input class="p-3 m-2 btn btn-outline-secondary form-control " type="button" value="8" onclick="disp('8')" /></td>
                    <td><input class="p-3 m-2 btn btn-outline-secondary form-control " type="button" value="9" onclick="disp('9')" /></td>
                    <td><input class="p-3 m-2 btn btn-outline-secondary form-control " type="button" value="-" onclick="disp('-')" /></td>
                </tr>
                <tr>
                    <td><input class="p-3 m-2 btn btn-outline-secondary form-control " type="button" value="0" onclick="disp('0')" /></td>
                    <td><input class="p-3 m-2 btn btn-outline-secondary form-control " type="button" value="." onclick="disp('.')" /></td>
                    <td><input class="p-3 m-2 btn btn-outline-success form-control " type="button" value="=" onclick="solve()" /></td>
                    <td><input class="p-3 m-2 btn btn-outline-secondary form-control " type="button" value="+" onclick="disp('+')" /></td>
                </tr>
            </table>
        </div>
            </div>
        </form>
    </div>
    <script>
        function disp(val) {
            document.getElementById("value").value += val;
        }

        function solve() {
            var x = document.getElementById("value").value;
            var y = eval(x);
            
            if (x==""){
                document.getElementById("result").value = "";
            }else{
                document.getElementById("result").value = y;
            }
        }
        function clr(){
            // alert('hello')
            document.getElementById("value").value = "";
            document.getElementById("result").value = "";
            
        }
        function del_one(){
            // alert("hello")
            y = document.getElementById("value").value.slice(0,-1);
            document.getElementById("value").value = y;
            solve();

        }

        
    </script>
</body>

</html>