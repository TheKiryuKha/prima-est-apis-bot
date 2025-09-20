from aiogram import Dispatcher
from aiogram import F
from aiogram.filters import Command
from handlers.start import get_start
from handlers.shop import shop
from handlers.product import index, show

def register_handlers(dp: Dispatcher):
    dp.message.register(get_start, Command(commands='start'))
    dp.message.register(shop, Command(commands='shop'))
    dp.callback_query.register(shop, F.data =='shop')

    dp.callback_query.register(index, F.data.startswith('category_'))
    dp.callback_query.register(show, F.data.startswith('product_'))