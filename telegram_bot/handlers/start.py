from aiogram import Bot
from aiogram.types import Message
from keyboards.start_keyboard import start_kb

async def get_start(message: Message, bot: Bot):
    await bot.send_message(message.from_user.id, f'Производство мёда без сиропа, антибиотиков и химии (с 2006 г) \n\n'
                           f'Частная эко-пасека в г. Гуково (Ростовская обл.) \n\n'
                           f'Доставка РФ и СНГ.', reply_markup=start_kb())