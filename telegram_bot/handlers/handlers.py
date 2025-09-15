from aiogram import Dispatcher
from aiogram.filters import Command
from handlers.start import get_start
from handlers.shop import shop

def register_handlers(dp: Dispatcher):
    dp.message.register(get_start, Command(commands='start'))
    dp.message.register(shop, Command(commands='shop'))