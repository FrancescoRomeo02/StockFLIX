from alpha_vantage.timeseries import TimeSeries
import pandas as pd
import numpy as np
from hconn_send import main

api_key = "D99JTY63MSIF56G9"


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
    if (data_type == 'd'):
        data, meta_data = ts.get_intraday(symbol=symbol,
                                          interval='1min',
                                          outputsize='full')
        data2 = data.drop(['1. open', '2. high', '3. low', '4. close'], axis=1)
        nice_data = data2.rename(columns={
            '4. close': 'Adj Close',
            '5. volume': 'volume'
        },
                                 inplace=False)

    fname = f"/home/romeo/StockN/Data/{symbol}_{data_type}.csv"
    nice_data.to_csv(fname)


symbols = []  #get symbols from php
data_input = []  #get data_type from php
for s in symbols:
    for data in data_input:
        get_ts(s, data)

main()