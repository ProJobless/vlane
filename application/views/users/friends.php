<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <td>Имя</td>
        <td>Город</td>
        <td>Школа</td>
        <td>Класс</td>
        <td></td>
    </tr>
    </thead>
    <tbody>
    <?php
    if (!empty($friends)) {
        $i = 0;
        foreach ($friends as $num) {
            echo "<tr><td><a href='" . site_url("/users/show") . "/" . $num["id"] . "'>";
            echo $num["name"];
            echo "</a></td><td>";
            echo $num["city"];
            echo "</td><td>";
            echo $num["school"];
            echo "</td><td>";
            echo $num["class"];
            echo "</td><td>";
            echo "
    <form action='del_friend' method='post'><input type='hidden' name='fid' value='" . $num["id"] . "'><input type='submit' class='btn btn-mini' value='X'></form>";
            echo "</td></tr>";
            $i++;
        }
    }
    ?></tbody>
</table>