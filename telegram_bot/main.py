from aiogram import Bot, Dispatcher
import asyncio
from dotenv import load_dotenv
import os
from pathlib import Path
from utils.commands import set_commands
from handlers.handlers import register_handlers

# TODO config
# TODO auth
# TODO delete message after writing new 

env_path = Path(__file__).parent.parent / '.env'
load_dotenv(dotenv_path=env_path)

token = os.getenv('TELEGRAM_BOT_TOKEN')
admin_id = os.getenv('TELEGRAM_ADMIN_ID');

bot = Bot(token=token)
dp = Dispatcher()

async def start_bot(bot: Bot):
    await bot.send_message(admin_id, text='Я запустил бота!')

dp.startup.register(start_bot)

register_handlers(dp)

async def start():
    await set_commands(bot)
    try:
        await dp.start_polling(bot, skip_updates=True)
    finally:
        await bot.session.close()

if __name__ == '__main__':
    asyncio.run(start())