from alpha_vantage.timeseries import TimeSeries
import pandas as pd
import numpy as np

api_key = "D99JTY63MSIF56G9"


def get_ts(symbol, data_type):
    ts = TimeSeries(key=api_key, output_format='pandas')
    if (data_type == 'y'):
        data, meta_data = ts.get_daily_adjusted(symbol=symbol,
                                                outputsize='compact')
        data2 = data.drop([
            '1. open', '2. high', '3. low', '5. adjusted close',
            '7. dividend amount', '8. split coefficient'
        ],
                          axis=1)
        nice_data = data2.rename(columns={
            '4. close': 'close',
            '6. volume': 'volume'
        },
                                 inplace=False)
    if (data_type == 'd'):
        data = ts.get_intraday(symbol, interval='5min', outputsize='compact')
        data2 = data.drop([
            '1. open',
            '2. high',
            '3. low',
        ], axis=1)
        nice_data = data2.rename(columns={
            '4. close': 'close',
            '5. volume': 'volume'
        },
                                 inplace=False)

    fname = "/home/romeo/StockN/Data/{}_{}.csv".format(symbol, data_type)
    nice_data.to_csv(fname)


symbols = ['NIO', 'XPEV', 'BYND']  #get name from php
data_input = ['y']
i = 0
for s in symbols:
    for data in data_input:
        get_ts(s, data)