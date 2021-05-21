import pandas as pd

f = pd.read_csv("/home/romeo/StockN/Data/nasdaq_screener_1621449789936.csv")
keep_col = ['Symbol', 'Name']
new_f = f[keep_col]
new_f.to_csv("newFile.csv")