<?php
    session_start();
    include_once "./controller/env.php";
    $query="SELECT * FROM list";
    $response=mysqli_query($conn,$query);

    $lists=mysqli_fetch_all($response,1);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>to do list</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="flex justify-center mt-[100px]">
    
    <div class="card box bg-slate-400 drop-shadow-xl px-5 py-3 w-[500px]">
        <div class="card-header p-4 rounded-t-lg">
            <h1 class="font-bold uppercase text-xl">todo List</h1>
        </div>
        <form action="controller/todo.php" mehtod="POST">
            <input type="text" class="w-[100%] rounded p-2" name="text">
            <?php
                if(!empty($_SESSION['error']))
                {
            ?>
                <span class="text-red font-semibold"><?=$_SESSION['error']."<br>"?></span>
            <?php
                }
            ?>
            <button type="submit" class="bg-blue-600 px-2 py-3 rounded ms-auto text-white font-semibold mt-2">Add text</button>
        </form>
        <div class="list my-3">
            <?php
                if($response->num_rows){
                foreach($lists as $list)
                {
            ?>
                <div class=" my-2 p-3 flex justify-between items-center <?=$list['status']==1 ? 'bg-green-700':'bg-white'?>">
                    <P class=" font-medium text-xl <?=$list['status']==1 ? 'text-white line-through':''?>"><?=$list['text']?></P>
                    <div class="edit_done">
                        <a href="./controller/delete.php?id=<?=$list['id']?>" class="bg-red-600 rounded text-white p-2">Delete</a>
                        <a href="./controller/done.php?id=<?=$list['id']?>" class="<?=$list['status']==1 ? 'bg-green-600':'bg-blue-600'?> rounded text-white p-2"><?=$list['status']==1 ? 'Done':'Do'?></a>
                    </div>
                </div>
            <?php
                }}
            ?>
        </div>
    </div>

</body>
</html>

<?php
    session_unset();
?>