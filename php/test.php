<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Test</title>
</head>
<body>
    <div>
        <form class="form-group container">
            <div class="form-group row">
                <div class="col-sm-2">
                    <label for="value1">Enter a value 1: </label>
                    <input type="text" class="form-control" id="value1">
                </div>
                <div class="col-sm-2">
                    <label for="value2">Enter a value 2: </label>
                    <input type="text" class="form-control" id="value2" >
                </div>
                <div class="col-sm-4">
                    <label for="value3">Final Result </label>
                    <input type="text" class="form-control" id="value3"  disabled>
                </div>

            </div>
            <div class="form-group row">
                <div class="col-sm-2">
                <button id="add" type="button" class="btn btn-outline-primary m-2" onclick="addNum()" >ADD</button>
                </div>
                <div class="col-sm-2">
                <button class="btn btn-outline-primary m-2" type="button" id="sub" onclick="subNum()">SUBSTRACT</button>
                </div>
                <div class="col-sm-2">
                <button class="btn btn-outline-primary m-2" type="button" id="multiply" onclick="multiNum()">MULTIPLY</button>
                </div>
                <div class="col-sm-2">
                <button class="btn btn-outline-primary m-2" type="button" id="division" onclick="divNum()">DIVISION</button>
                </div>

            </div>
            <div class="form-group-row">
                <div>
                    <button type="button" value="1" onclick = >1</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        function addNum(){
            // alert("hello vivek")
            var v1 =  parseInt(document.getElementById("value1").value);
            var v2 =  parseInt(document.getElementById("value2").value);
            //  alert(v1+v2)
             document.getElementById("value3").value = v1+v2;
            // var v2 = int(document.getElementById("value2").value);
            // var v3 = v1+v2;
            // alert(v1);
        }
        function subNum(){
            // alert("hello vivek")
            var v1 =  parseInt(document.getElementById("value1").value);
            var v2 =  parseInt(document.getElementById("value2").value);
            //  alert(v1+v2)
             document.getElementById("value3").value = v1-v2;
            // var v2 = int(document.getElementById("value2").value);
            // var v3 = v1+v2;
            // alert(v1);
        }
        function multiNum(){
            // alert("hello vivek")
            var v1 =  parseInt(document.getElementById("value1").value);
            var v2 =  parseInt(document.getElementById("value2").value);
            //  alert(v1+v2)
             document.getElementById("value3").value = v1*v2;
            // var v2 = int(document.getElementById("value2").value);
            // var v3 = v1+v2;
            // alert(v1);
        }
        function divNum(){
            // alert("hello vivek")
            var v1 =  parseInt(document.getElementById("value1").value);
            var v2 =  parseInt(document.getElementById("value2").value);
            //  alert(v1+v2)
             document.getElementById("value3").value = v1/v2;
            // var v2 = int(document.getElementById("value2").value);
            // var v3 = v1+v2;
            // alert(v1);
        }
        
    </script>
</body>

</html>