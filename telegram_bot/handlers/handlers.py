from aiogram import Dispatcher
from aiogram import F
from aiogram.filters import Command
from handlers.start import get_start
from handlers.shop import shop
from handlers.product import index, show
from handlers.cart import store, show as cart_show, destroy, edit
from handlers.cart_item import destroy as cart_item_destroy, store as cart_item_store
from handlers.none import none
from handlers.invoice import start_create, create as create_invoice, store as store_invoice
from state.StoreInvoiceState import StoreInvoiceState


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

    dp.callback_query.register(edit, F.data == 'edit_cart')

    dp.callback_query.register(cart_item_destroy, F.data.startswith('decrease_cart:'))
    dp.callback_query.register(cart_item_store, F.data.startswith('increase_cart:'))
    
    
    dp.callback_query.register(none, F.data == 'none')

    dp.callback_query.register(start_create, F.data == 'start_create_invoice')
    dp.callback_query.register(create_invoice, F.data == 'create_invoice')
    dp.message.register(store_invoice, StoreInvoiceState.regData)