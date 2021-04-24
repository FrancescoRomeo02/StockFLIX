import pandas as pd

with open("/home/romeo/StockN/stock.txt") as f:
    lines = f.readlines()

with open("/home/romeo/StockN/Data/stock_format.csv", "w") as f:
    for line in lines:
        res = line.split('|', 2)
        data = res[0] + ', ' + res[1] + '\n'
        f.writelines(data)
