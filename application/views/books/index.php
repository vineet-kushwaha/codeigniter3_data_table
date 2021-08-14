<!DOCTYPE html>
<html lang="en">

<head>
    <title>Book Display</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/> -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <div class="container">
        <form action="read/csv" method="post" enctype="multipart/form-data">
            <label for="enterCSV">Enter CSV
                <input type="file" name="enterCSV" accept=".csv">
                <button type="submit" class="btn btn-success">Read CSV</button>
            </label>
        </form>
    </div><br>
    <table class="container table">
        <tr class="table-row">
            <td>
                
            </td>
        </tr>
    </table>
    <div class="container ">
        <a href="export/csv" type="button" class="btn btn-success">Export csv</a>

        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                    <th></th>
                    <th><label for="naem">Book Name: </label>
                        <select name="name" id="name">
                        <?php foreach($name as $n): ?>
                            <option value=""><?php echo $n->name; ?></option>
                        <?php endforeach ?>
                    </select></th>
                    <th><label for="price">Price: </label>
                        <select name="price" id="price">
                        <?php foreach($price as $pri): ?>
                            <option value=""><?php echo $pri->price; ?></option>
                        <?php endforeach ?>
                    </select></th>
                    <th><label for="author">Author: </label>
                        <select name="author" id="author">
                        <?php foreach($author as $aut): ?>
                            <option value=""><?php echo $aut->author; ?></option>
                        <?php endforeach ?>
                    </select></th>
                    <th><label for="publisher">Publisher: </label>
                        <select name="publisher" id="publisher">
                        <?php foreach($publisher as $pub): ?>
                            <option value=""><?php echo $pub->publisher; ?></option>
                        <?php endforeach ?>
                    </select></th>
                    <th><label for="rating">Rating: </label>
                        <select name="rating" id="rating">
                        <?php foreach($rating as $rat): ?>
                            <option value=""><?php echo $rat->rating; ?></option>
                        <?php endforeach ?>
                    </select></th>
                    <th></th>
                </tr>
                <tr>
                    <th>S.NO.</th>
                    <th>Book Name</th>
                    <th>Price</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Rating</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($books as $r) : ?>
                
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $r->name; ?></td>
                        <td><?php echo $r->price . ' ' . '$'; ?></td>
                        <td><?php echo $r->author; ?></td>
                        <td><?php echo $r->publisher; ?></td>
                        <td><?php echo $r->rating . '/10'; ?></td>
                        <td><a href="viewdata/<?= $r->ID; ?>" class="btn btn-outline-success">Edit</a></td>
                    </tr>
                <?php $i++;
                endforeach ?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                //'searching': false, // Remove default Search Control
                'ajax': {
                    'url': 'book/search',
                    'data': function(data) {
                        // Read values
                        var gender = $('#searchByGender').val();
                        var name = $('#searchByName').val();

                        // Append to data
                        data.searchByGender = gender;
                        data.searchByName = name;
                    }
                },
                'columns': [{
                        data: 'emp_name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'gender'
                    },
                    {
                        data: 'salary'
                    },
                    {
                        data: 'city'
                    },
                ]
            });

            $('#searchByName').keyup(function() {
                dataTable.draw();
            });

            $('#searchByGender').change(function() {
                dataTable.draw();
            });
        });
        //     } );
        // } );
    </script>

</body>

</html>