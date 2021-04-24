<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>jQuery UI autocomplete</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .ui-autocomplete-category {
            font-weight: bold;
            padding: .2em .4em;
            margin: .8em 0 .2em;
            line-height: 1.5;
            color: red;
        }
    </style>
    <script>
        $(function() {
            $.widget("custom.autocompleteCategory", $.ui.autocomplete, {
                _create: function() {
                    this._super();
                    this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
                },
                _renderMenu: function(ul, items) {
                    var that = this,
                        currentCategory = "";
                    $.each(items, function(index, item) {
                        var li;
                        if (item.category != currentCategory) {
                            ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
                            currentCategory = item.category;
                        }
                        li = that._renderItemData(ul, item);
                        if (item.category) {
                            li.attr("aria-label", item.category + " : " + item.label);
                        }
                    });
                }
            });
            var italianTeams = [{
                    label: "Juventus",
                    category: "North"
                },
                {
                    label: "Inter",
                    category: "North"
                },
                {
                    label: "Milan",
                    category: "North"
                },
                {
                    label: "Roma",
                    category: "Center"
                },
                {
                    label: "Lazio",
                    category: "Center"
                },
                {
                    label: "Napoli",
                    category: "South"
                },
                {
                    label: "Palermo",
                    category: "South"
                }
            ];
            $("#tags").autocompleteCategory({
                source: italianTeams
            });
        });
    </script>
</head>

<body>
    <div class="ui-widget">
        <label for="tags">Squadre: </label>
        <input id="tags">
    </div>
</body>

</html>