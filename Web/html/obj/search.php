<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script>
        $(function() {
            $.widget("custom.autocompleteCategory", $.ui.autocomplete, {
                _create: function() {
                    this._super();
                    this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
                },
                _renderMenu: function(ul, items) {
                    var that = this;
                    $.each(items, function(index, item) {
                        var li;
                        li = that._renderItemData(ul, item);
                        if (item.category) {
                            li.attr("aria-label", item.label);
                        }
                    });
                }
            });

            $importer = new CsvImporter("../../../Data/stock.csv", true);
            while ($data = $importer) {
                print_r($data);
            }

            $("#tags").autocompleteCategory({
                source: stocks
            });
        });
    </script>
</head>

<body>
    <div class="ui-widget">
        <label for="tags"></label>
        <input id="tags">
    </div>
</body>

</html>