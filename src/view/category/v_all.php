<main>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <td>
                        <strong>Category title</strong>
                    </td>
                    <td>
                        <strong>Edit</strong>
                    </td>
                    <td>
                        <strong>Delete</strong>
                    </td>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <div id="addCategoryBlock">
                            <button id="addCategory">Add category</button>
                        </div>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td>
                        <div class="categoryDetails">
                            <p class="categoryName"><?=$category['name']?></p>
                            <input type="hidden" class="categoryId" value="<?=$category['id']?>">
                        </div>
                    </td>
                    <td>
                        <button class="editCategory">Edit</button>
                    </td>
                    <td>
                        <button class="deleteCategory">Delete</button>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <div id="addResult">
        </div>
    </div>
</main>
<footer class="fixed-bottom text-center">
    2023 &#169; Alex
</footer>
<script type="text/javascript">
$(document).ready(function() {
    $("#addCategory").click(function(e) {
        e.preventDefault();
        var categoryNameInput = $("<input>").attr("type", "text").attr("id", "addCategoryInput").attr(
            "placeholder", "Enter category name...");
        var categoryAddButton = $("<button>").attr("id", "addCategorySave").html("Save");
        var categoryCancelButton = $("<button>").attr("id", "addCategoryCancel").html("Cancel");
        $("#addCategory").css("display", "none");
        $("#addCategoryBlock").append(categoryNameInput);
        $("#addCategoryBlock").append(categoryAddButton);
        $("#addCategoryBlock").append(categoryCancelButton);

        $("#addCategoryCancel").click(function() {
            $("#addCategory").css("display", "block");
            $("#addCategoryInput").remove();
            $("#addCategorySave").remove();
            $("#addCategoryCancel").remove();
        });

        $("#addCategorySave").click(function() {
            var categoryName = $("#addCategoryInput").val();
            $.ajax({
                url: "category/add",
                type: "POST",
                data: {
                    "categoryName": categoryName
                },
            }).done(function(msg) {
                $("#addResult").append(msg);
            });
        });
    });

    $(".deleteCategory").click(function() {
        var categoryId = $(this).closest("tr").find(".categoryId").val();
        $.ajax({
            url: "category/" + categoryId + "/delete",
            type: "POST"
        }).done(function(msg) {
            $("#addResult").append(msg);
        });
    });

    $(".editCategory").click(function() {
        var categoryId = $(this).closest("tr").find(".categoryId").val();
        var categoryName = $(this).closest("tr").find(".categoryName");

        categoryName.css("display", "none");
        var categoryNameInput = $("<input>").attr("type", "text").attr("id", "editCategoryInput").attr(
            "placeholder", "Enter category name...").val(categoryName.html());
        var categorySaveEditButton = $("<button>").attr("class", "editCategorySave").html("Save");
        var categoryCancelEditButton = $("<button>").attr("class", "editCategoryCancel").html("Cancel");

        var categoryBlock = $(this).closest("tr").find(".categoryDetails");
        categoryBlock.append(categoryNameInput);
        categoryBlock.append(categorySaveEditButton);
        categoryBlock.append(categoryCancelEditButton);
        $(this).css("display", "none");

        $(categoryCancelEditButton).click(function() {
            $(".editCategory").css("display", "block");
            categoryNameInput.remove();
            categorySaveEditButton.remove();
            categoryCancelEditButton.remove();
            categoryName.css("display", "block");
        });

        $(categorySaveEditButton).click(function() {
            var newCategoryName = categoryNameInput.val();
            $.ajax({
                url: "category/" + categoryId + "/edit",
                type: "post",
                data: {
                    "categoryName": newCategoryName,
                    "id": categoryId
                }
            }).done(function(msg) {
                $("#addResult").append(msg);
            });
            categoryCancelEditButton.click();
        });
    });

});
</script>