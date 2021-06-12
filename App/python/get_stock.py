import pandas as pd
file_path = 'C:/Users/Francesco Romeo/Documents/Scuola/StockFLIX/otherlisted.csv'
f = pd.read_csv(file_path, usecols=[0, 1], delimiter='|', header=0)
f.drop_duplicates()
f.to_csv("newFile.csv", index=False)
