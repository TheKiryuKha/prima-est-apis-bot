from aiogram import Bot
from aiogram.types import CallbackQuery
from aiogram.fsm.context import FSMContext
from state.StoreInvoiceState import StoreInvoiceState
from utils.clear_messages import clear
from keyboards.start_create_invoice_keyboard import create_kb
from aiogram.types import Message
from utils.api import get_cart, create_invoice
from actions.generate_invoice_text import generate


async def start_create(update: CallbackQuery, bot: Bot):
    await update.answer()
    await clear(update, bot)

    message = (f"<b>СДЭК доставка </b>\n\n"
    f"Доставка РФ и СНГ\n\n"
    f"Оплата доставки производится при получении самостоятельно.\n\n"
    f"<b>Заказы отправляются в дни: понедельник, среда, пятница.</b> В выходные дни доставка не осуществляется.\n\n"
    f"<b>Гарантируем сбор вашего заказа и передачу в отдел логистики в течение трех дней после получения оплаты</b> (не считая выходных).\n\n"
    f"Пожалуйста, обратите внимание на эту информацию, чтобы не беспокоиться о статусе вашего заказа.\n\n"
    f"Также <b>вам придёт уведомление в боте, когда ваш заказ будет собран и передан в отдел логистики.</b>\n\n"
    f"<b>Для связи с поддержкой:</b> @celestialwordlove\n\n")

    await bot.send_message(
        chat_id=update.from_user.id,
        text=message,
        reply_markup=create_kb(),
        parse_mode='HTML'
    )

async def create(update: CallbackQuery, bot: Bot, state: FSMContext):
    await update.answer()
    
    message = (
        f"Отлично! Приступим к оформлению заказа\n\n"

        f"Отправь, пожалуйста, свой данные в таком формате:\n\n"

        f"<b>"
        f"ФИО (как в паспорте)\n"
        f"Номер телефона (без плюса, только цифры),\n"
        f"Адрес ближайшего пункта выдачи СДЭК\n\n"
        f"</b>"

        f"Пример:\n\n"

        f"<b>"
        f"Пупкин Василий Алексеевич\n"
        f"375447191945\n"
        f"ул. Ильича, 26\n\n"
        f"</b>"
        f"❗️Внимание, я чувствителен к формату"
    )

    await bot.send_message(
        chat_id=update.from_user.id,
        text=message,
        parse_mode='HTML'
    )
    await state.set_state(StoreInvoiceState.regData)

async def store(update: Message, state: FSMContext, bot: Bot):
    lines = update.text.split('\n')

    if len(lines) != 3:
        await bot.send_message(
            update.from_user.id,
            f'❗️ Похоже ты ввел не все необходимые данные или ввел их в неверном формате. Пожалуйста, попробуй еще раз'
        )
        return    

    fio_parts = lines[0].split()

    last_name = fio_parts[0]
    first_name = fio_parts[1]
    middle_name = fio_parts[2]
    
    phone = lines[1].strip()
    
    address = lines[2].strip()
    
    cart = get_cart(update.from_user.id)
    response = create_invoice(
        cart['id'],
        first_name,
        last_name,
        middle_name,
        address,
        phone
    )

    if response.status_code == 201:
        await state.clear() 
        await clear(update, bot)

        invoice = response.json()['data']
        
        await bot.send_message(
            chat_id=update.from_user.id,
            text=generate(invoice),
            parse_mode='HTML'
        )
