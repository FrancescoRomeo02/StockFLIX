from alpha_vantage.timeseries import TimeSeries
from alpha_vantage.async_support.timeseries import TimeSeries
import json
import asyncio


async def get_data(symbol, type_data):
    ts = TimeSeries(key='D99JTY63MSIF56G9')
    if (type_data == 'y'):
        data, _ = await ts.get_daily_adjusted(symbol, outputsize='full')
    if (type_data == 'd'):
        data, _ = await ts.get_intraday(symbol,
                                        interval='5min',
                                        outputsize='compact')
        data.update(_)
    await ts.close()
    return data


symbols = ['NIO']
type_data = input('y oppure d: ')
loop = asyncio.get_event_loop()
tasks = [get_data(symbol, type_data) for symbol in symbols]
group1 = asyncio.gather(*tasks)
results = loop.run_until_complete(group1)
loop.close()
jsonObj = json.dumps(results)

if (type_data == 'y'):
    with open('/Data/year.json', 'w') as f:
        f.write(jsonObj)

if (type_data == 'd'):
    with open('/home/romeo/StockN/Data/daily.json', 'w') as f:
        f.write(jsonObj)