from aiogram import Dispatcher
from aiogram import F
from aiogram.filters import Command
from handlers.start import get_start
from handlers.shop import shop
from handlers.product import index, show
from handlers.cart import store, show as cart_show, destroy

def register_handlers(dp: Dispatcher):
    dp.message.register(get_start, Command(commands='start'))
    dp.message.register(shop, Command(commands='shop'))
    dp.callback_query.register(shop, F.data =='shop')

    dp.callback_query.register(index, F.data.startswith('category_'))
    dp.callback_query.register(show, F.data.startswith('product_'))

    dp.callback_query.register(store, F.data.startswith('addToCart_'))

    dp.callback_query.register(cart_show, F.data == 'cart')
    dp.message.register(cart_show, Command(commands='cart'))

    dp.callback_query.register(destroy, F.data == 'clear_cart')