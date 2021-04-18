from alpha_vantage.timeseries import TimeSeries
from alpha_vantage.async_support.timeseries import TimeSeries

import json
import asyncio
""" ts = TimeSeries(
    key='D99JTY63MSIF56G9',
    output_format='json',
)
data = ts.get_intraday(symbol='NIO', interval='5min', outputsize='compact')
print(type(data))

jsonObj = json.dumps(data)
print(type(jsonObj))

 """

symbols = ['AAPL', 'NIO']


async def get_data(symbol):
    ts = TimeSeries(key='D99JTY63MSIF56G9')
    data, _ = await ts.get_intraday(symbol,
                                    interval='5min',
                                    outputsize='compact')
    await ts.close()
    data.update(_)
    return data


loop = asyncio.get_event_loop()
tasks = [get_data(symbol) for symbol in symbols]
group1 = asyncio.gather(*tasks)
results = loop.run_until_complete(group1)
loop.close()
jsonObj = json.dumps(results)
with open('Export_DataFrame.json', 'w') as f:
    f.write(jsonObj)