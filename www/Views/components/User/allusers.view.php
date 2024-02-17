<h2>Tous les utilisateurs</h2>
<section class="section1-status-tab">
<div class="user-table">
    <table class="responsive-table" id="myTable">
        <thead class="responsive-th">
            <tr>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="responsive-tb">
            <?php

                $userController = new \App\Controllers\User();
                $allUsers = $userController->getUsers();

                foreach ($allUsers as $userData): ?>
                <tr>
                    <td><?php echo $userData['firstname']; ?></td>
                    <td><?php echo $userData['email']; ?></td>
                    <td><?php echo $userData['status']; ?></td>
                    <td><a href="#" class="link-danger">supprimer</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</section>

<script>
    $(document).ready(function() {
        var table = $('#myTable').DataTable({
            "rowCallback": function(row, data, index) {
                if (index % 2 === 0) {
                    $(row).css("background-color", "white");
                } else {
                    $(row).css("background-color", "");
                }
            },
            "drawCallback": function(settings) {
                var rows = table.rows({ page: 'current' }).nodes();
                $(rows).each(function(index) {
                    if (index % 2 === 0) {
                        $(this).css("background-color", "white");
                    } else {
                        $(this).css("background-color", "");
                    }
                });
            }
        });
    });

</script>
