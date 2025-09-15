from aiogram import Bot
from aiogram.types import Message
from keyboards.categories_keyboard import create_kb

async def shop(message: Message, bot: Bot):
    await bot.send_message(message.from_user.id, f'Наши товары:', reply_markup=create_kb())
