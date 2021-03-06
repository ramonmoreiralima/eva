/*************************************************************************
 * Copyright (C) 2008 Tavian Barnes <tavianator@gmail.com>               *
 *                                                                       *
 * This file is part of The FPFD Library.                                *
 *                                                                       *
 * The FPFD Library is free software; you can redistribute it and/or     *
 * modify it under the terms of the GNU Lesser General Public License as *
 * published by the Free Software Foundation; either version 3 of the    *
 * License, or (at your option) any later version.                       *
 *                                                                       *
 * The FPFD Library is distributed in the hope that it will be useful,   *
 * but WITHOUT ANY WARRANTY; without even the implied warranty of        *
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU     *
 * Lesser General Public License for more details.                       *
 *                                                                       *
 * You should have received a copy of the GNU Lesser General Public      *
 * License along with this program.  If not, see                         *
 * <http://www.gnu.org/licenses/>.                                       *
 *************************************************************************/

#include "fpfd_impl.h"

int
fpfd32_nan_p(fpfd32_srcptr src)
{
  fpfd32_impl_t impl;
  fpfd32_impl_expand(&impl, src);
  return impl.fields.special == FPFD_SNAN || impl.fields.special == FPFD_QNAN;
}

int
fpfd32_inf_p(fpfd32_srcptr src)
{
  fpfd32_impl_t impl;
  fpfd32_impl_expand(&impl, src);
  return impl.fields.special == FPFD_INF;
}

int
fpfd32_number_p(fpfd32_srcptr src)
{
  fpfd32_impl_t impl;
  fpfd32_impl_expand(&impl, src);
  return impl.fields.special == FPFD_ZERO || impl.fields.special == FPFD_NUMBER;
}

int
fpfd32_zero_p(fpfd32_srcptr src)
{
  fpfd32_impl_t impl;
  fpfd32_impl_expand(&impl, src);
  return impl.fields.special == FPFD_ZERO;
}
