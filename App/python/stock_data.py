from alpha_vantage.timeseries import TimeSeries
import pandas as pd
import numpy as np
import os

api_key = "D99JTY63MSIF56G9"
symbols = []
data_input = 'y'


def get_ts(symbol, data_type):
    ts = TimeSeries(key=api_key, output_format='pandas')
    if (data_type == 'y'):
        data, meta_data = ts.get_daily_adjusted(symbol=symbol,
                                                outputsize='full')
        data2 = data.drop([
            '1. open', '2. high', '3. low', '4. close', '7. dividend amount',
            '8. split coefficient'
        ],
                          axis=1)
        nice_data = data2.rename(columns={
            '5. adjusted close': 'Adj Close',
            '6. volume': 'volume'
        },
                                 inplace=False)

    fname = f"/home/romeo/StockN/Data/{symbol}_{data_type}.csv"
    nice_data.to_csv(fname)


def main():
    with open("/home/romeo/StockN/Data/stockname.txt") as file:
        for line in file:
            line = line.strip()
            symbols.append(line)

    for symbol in symbols:
        get_ts(symbol, data_input)


main()

os.system('python3 App/python/file_up.py')