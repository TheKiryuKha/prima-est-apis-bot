from aiogram import Bot
from aiogram.types import CallbackQuery
from aiogram.fsm.context import FSMContext
from state.StoreInvoiceState import StoreInvoiceState
from utils.clear_messages import clear
from keyboards.start_create_invoice_keyboard import create_kb


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